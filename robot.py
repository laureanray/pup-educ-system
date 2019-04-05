import random
import time
import subprocess
import pyautogui
names_list = []

for line in open('names.txt', 'r').readlines():
    names_list.append(line)


def file_len(fname):
    with open(fname) as f:
        for i, l in enumerate(f):
            pass
    return i + 1

def getRandomName():
    fname = 'names.txt'
    index = random.randint(1,file_len(fname))
    return names_list[index].rstrip()

def getRandomAge():
    return str( random.randint(3, 8))

# Launch Chrome and Enroll
subprocess.Popen(["google-chrome", "localhost/student/enroll.php"])
time.sleep(1.5)
pyautogui.typewrite(getRandomName(), )
pyautogui.hotkey('tab')
pyautogui.typewrite(getRandomName() + ' '  + getRandomName(), )
pyautogui.hotkey('tab')
pyautogui.typewrite(getRandomName(), )
pyautogui.hotkey('tab')
pyautogui.typewrite(getRandomName(), )
pyautogui.hotkey('tab')
pyautogui.typewrite('09/19/1999', )
pyautogui.hotkey('tab')
pyautogui.hotkey('tab')
pyautogui.typewrite(getRandomAge(), )
pyautogui.hotkey('tab')
pyautogui.press('down')
pyautogui.hotkey('tab')
pyautogui.typewrite('363 A Damayan St., Brgy. 622, Bacood, Sta. Mesa, Manila 1016', )
pyautogui.hotkey('tab')
pyautogui.typewrite(getRandomName()  + ' ' + getRandomName(), )
pyautogui.hotkey('tab')
pyautogui.typewrite('09097164701', )
pyautogui.hotkey('tab')
pyautogui.typewrite('Astronaut', )
pyautogui.hotkey('tab')
pyautogui.typewrite(getRandomName() + ' ' + getRandomName(), )
pyautogui.hotkey('tab')
pyautogui.typewrite('09395161001', )
pyautogui.hotkey('tab')
pyautogui.typewrite('Engineer', )
pyautogui.hotkey('enter')
# time.sleep(1)
# pyautogui.hotkey('tab')
# pyautogui.hotkey('tab')
# pyautogui.hotkey('tab')
# time.sleep(0.25)
# pyautogui.typewrite('localhost/faculty/index.php?page=enrollees', )
# pyautogui.hotkey('enter')
