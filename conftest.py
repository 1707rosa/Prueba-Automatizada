import pytest
from selenium import webdriver
from datetime import datetime
import os

os.makedirs("screenshots", exist_ok=True)
os.makedirs("reports", exist_ok=True)


def pytest_configure(config):
    config.option.htmlpath = 'reports/reporte_pruebas.html'


@pytest.fixture
def browser():
    options = webdriver.ChromeOptions()
    #options.add_argument('--headless')  
    driver = webdriver.Chrome(options=options)
    driver.set_window_size(1920, 1080)
    yield driver
    driver.quit()


@pytest.hookimpl(hookwrapper=True)
def pytest_runtest_makereport(item, call):
    outcome = yield
    rep = outcome.get_result()

    driver = item.funcargs.get("browser", None)

    if rep.when == "call" and driver is not None:
        try:
            timestamp = datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
            filepath = os.path.join("screenshots", f"{item.name}_{timestamp}.png")
            driver.save_screenshot(filepath)

            if item.config.pluginmanager.hasplugin("html"):
                from pytest_html import extras
                extra = getattr(rep, "extra", [])
                extra.append(extras.image(filepath))
                rep.extra = extra

        except Exception as e:
            print(f"⚠️ No se pudo tomar la captura para {item.name}: {e}")
