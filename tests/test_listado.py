import time

def test_listado_personajes(browser):
    browser.get("http://localhost/barbie/mundo_barbie/listar_personajes.php")
    time.sleep(2)

    assert "Personajes registrados" in browser.page_source or "Barbie" in browser.page_source
