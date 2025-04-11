import time

def test_acceso_dashboard(browser):
    browser.get("http://localhost/barbie/mundo_barbie/dashboard.php")
    time.sleep(2)

    assert "Dashboard" in browser.title or "Panel" in browser.page_source
