# esp8266-SoilMoistureSensor
Final Project for CS50: https://courses.edx.org/courses/course-v1:HarvardX+CS50+X/

The ESP8266 runs a program once every hour that takes a soil moisture reading from a houseplant, provides visual feedback via OLED display and sends reading over WiFi to server which then updates a MySQL database via PHP. If the houseplant is found to be "dry," an email message is sent via PHP to the user.

<h4>Tested Hardware:</h4>WeMos D1 Mini (ESP8266) with WeMos-made 64x48-pixel OLED Shield and YL-69/YL-38 soil moisture sensor.

ESP8266 code tested and compiled via Arduino IDE 1.5.4.
The server requires MySQL to store soil moisture values.
The website itself is designed MVC-style, using CS50's Problem Set 7 as a basis (without utilizing the CS50 Library), and utilizes the Bootstrap framework, Google Fonts and CSS3 for styling.

<h4>Known Issues:</h4> Though the WeMos D1 Mini goes into deepsleep, eletrolysis is likely to erode the sensors of the YL-69 over extended use (a week or two).
