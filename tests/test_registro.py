import time

def test_registro_personaje(browser):
    browser.get("http://localhost/barbie/mundo_barbie/registrar_personaje.php")

    browser.find_element("name", "nombre").send_keys("Barbie Científica")
    browser.find_element("name", "profesion").send_keys("Científica")
    browser.find_element("name", "descripcion").send_keys("Explora el espacio")
    browser.find_element("name", "imagen").send_keys("https://example.com/barbie.jpg")
    browser.find_element("css selector", "button[type='submit']").click()

    time.sleep(2)
    assert "Barbie Científica" in browser.page_source
