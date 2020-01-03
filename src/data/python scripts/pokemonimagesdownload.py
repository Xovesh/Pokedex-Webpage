from urllib import request
import os

DIRECTORY1 = "./images/"
MAX_POKEMON = 809
URLIMAGES = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/"


# Checks if the folders exists
def check_directory():
    # checking /images folder
    if not os.path.exists(DIRECTORY1):
        print("Creating new directory " + DIRECTORY1)
        os.makedirs(DIRECTORY1)


def convert_number(number):
    if number < 10:
        return "00" + str(number)
    elif 10 <= number < 100:
        return "0" + str(number)
    else:
        return str(number)


# checks if all images are in the folder
def check_images():
    # Pokemon pictures
    for l in range(MAX_POKEMON):
        path = DIRECTORY1 + convert_number(l + 1) + ".png"
        url = URLIMAGES + convert_number(l + 1) + ".png"
        if not os.path.isfile(path):
            try:
                downloadimages(url, convert_number(l + 1))
                print(convert_number(l + 1) + ".png downloaded " + convert_number(l + 1) + "/" + str(MAX_POKEMON))
            except:
                print("We cant download the image at this moment, please try again later || number: %i" % (l + 1))


# download an image
def downloadimages(url, file_name):
    full_path = DIRECTORY1 + file_name + ".png"
    request.urlretrieve(url, full_path)


check_directory()
check_images()
