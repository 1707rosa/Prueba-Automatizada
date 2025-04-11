import time

def test_editar_personaje(browser):
    browser.get("http://localhost/barbie/mundo_barbie/listar_personajes.php")
    time.sleep(2)

    # Buscar el botón editar del primer personaje (ajusta si usas otro selector)
    editar_links = browser.find_elements("link text", "Editar")
    assert editar_links, "No se encontró ningún botón 'Editar'"

    editar_links[0].click()
    time.sleep(2)

    nombre_input = browser.find_element("name", "nombre")
    nombre_input.clear()
    nombre_input.send_keys("Barbie Astronauta")
    browser.find_element("css selector", "button[type='submit']").click()
    time.sleep(2)

    assert "Barbie Astronauta" in browser.page_source
