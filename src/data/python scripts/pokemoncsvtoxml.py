import pandas as pd


def convert_number(number):
    if number < 10:
        return "00" + str(number)
    elif 10 <= number < 100:
        return "0" + str(number)
    else:
        return str(number)


data = pd.read_csv("pokemon.csv")
xml = open("pokemon.xml", "w", encoding="utf-8")
xml.write("""<?xml version="1.0" encoding="UTF-8" standalone="no" ?>""")
xml.write("""<!DOCTYPE pokemons SYSTEM "pokemon.dtd">""")
xml.write("<pokemons last_id=\"801\" last_gen=\"7\">")
xml.write("<generacion id=\"1\">")
genvisited = {1}
for index, pok in data.iterrows():
    if int(pok["generation"]) not in genvisited:
        xml.write("</generacion>")
        xml.write("<generacion id=\""+str(pok["generation"])+"\">")
        genvisited.add(int(pok["generation"]))
    w = "<pokemon id=\"{}\">" \
        "<pokedex_number>{}</pokedex_number>" \
        "<generation>{}</generation>" \
        "<legendary>{}</legendary>" \
        "<name>{}</name>" \
        "<jp_name>{}</jp_name>" \
        "<picture_local>/pictures/pokemon/{}.png</picture_local>" \
        "<picture_web>https://assets.pokemon.com/assets/cms2/img/pokedex/full/{}.png</picture_web>" \
        "<weight_kg>{}</weight_kg>" \
        "<height_m>{}</height_m>" \
        "<male_percentage>{}</male_percentage>" \
        "<type1>{}</type1>" \
        "<type2>{}</type2>" \
        "<classification>{}</classification>" \
        "<capture_rate>{}</capture_rate>" \
        "<base_egg_steps>{}</base_egg_steps>" \
        "<abilities>{}</abilities>" \
        "<experience_growth>{}</experience_growth>" \
        "<base_happiness>{}</base_happiness>" \
        "<hp>{}</hp>" \
        "<attack>{}</attack>" \
        "<defense>{}</defense>" \
        "<sp_attack>{}</sp_attack>" \
        "<sp_defense>{}</sp_defense>" \
        "<speed>{}</speed>" \
        "<base_total>{}</base_total>" \
        "</pokemon>".format(convert_number(pok["pokedex_number"]), convert_number(pok["pokedex_number"]),
                            str(pok["generation"]),
                            str(pok["is_legendary"]),
                            str(pok["name"]), str(pok["japanese_name"]), convert_number(pok["pokedex_number"]),
                            convert_number(pok["pokedex_number"]),
                            str(pok["weight_kg"]), str(pok["height_m"]),
                            str(pok["percentage_male"]), str(pok["type1"]), str(pok["type2"]),
                            str(pok["classfication"]),
                            str(pok["capture_rate"]), str(pok["base_egg_steps"]), str(pok["abilities"]),
                            str(pok["experience_growth"]),
                            str(pok["base_happiness"]), str(pok["hp"]), str(pok["attack"]), str(pok["defense"]),
                            str(pok["sp_attack"]),
                            str(pok["sp_defense"]), str(pok["speed"]), str(pok["base_total"]))
    xml.write(w)
xml.write("</generacion>")
xml.write("</pokemons>")
xml.close()
