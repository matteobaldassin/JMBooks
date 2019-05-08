from pyzbar.pyzbar import decode
import cv2

filename = "img2.jpg"
img = cv2.imread(filename)
gray_img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

barcodes = decode(gray_img)
print(barcodes)