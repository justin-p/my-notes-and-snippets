import cv2
import matplotlib.pyplot as plt

img = cv2.imread("flipped.jpg", 0)
new_img = cv2.rotate(img, cv2.ROTATE_90_CLOCKWISE)
plt.imshow(new_img, cmap="gray")