import time

def test_eliminar_personaje(browser):
    browser.get("http://localhost/barbie/mundo_barbie/listar_personajes.php")
    time.sleep(2)

    eliminar_links = browser.find_elements("link text", "Eliminar")
    assert eliminar_links, "No se encontró ningún botón 'Eliminar'"

    eliminar_links[0].click()
    browser.switch_to.alert.accept()  # Confirmar alerta
    time.sleep(2)

    assert "Eliminado" in browser.page_source or "Barbie" not in browser.page_source
