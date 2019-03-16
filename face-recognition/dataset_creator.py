import cv2, sys, json
import numpy as np

faceDetect = cv2.CascadeClassifier('C:\\xampp\\htdocs\\CBS\\face-recognition\\haarcascade_frontalface_default.xml')
cam = cv2.VideoCapture(0)    

Id = sys.argv[1]
# Id = '123456789'
# Id = '999999999'

i = 1
while (True):
    ret, img = cam.read()
    if ret is True:
        grayImg = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        faces = faceDetect.detectMultiScale(grayImg, 1.3, 5)
    
        for (x, y, w, h) in faces:
            cv2.imwrite("C:\\xampp\\htdocs\\CBS\\face-recognition\\dataset\\user-" + str(Id) + "." + str(i) + ".jpg", grayImg[y : y + h, x : x + w])
            cv2.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 2)
            i += 1
            cv2.waitKey(100)

        cv2.imshow("Camera", img)
        cv2.waitKey(1)

        if (i > 20):
            break
        if (cv2.waitKey(1) == ord('q')):
            break

cam.release()
cv2.destroyAllWindows()

##print ("OK 1")