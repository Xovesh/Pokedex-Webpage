import csv
from xml.etree.ElementTree import Element, SubElement, Comment
import prettyXML 

type_dict_list = []

# child_with_tail = SubElement(top, 'child_with_tail')
# child_with_tail.text = 'This child has regular text.'
# child_with_tail.tail = 'And "tail" text.'

# child_with_entity_ref = SubElement(top, 'child_with_entity_ref')
# child_with_entity_ref.text = 'This & that'

def create_type_dictionary():
    dictionary = {
        "type_name": "TYPENAME",
        "type_color":"COLOR",
        "attack_effective":[],
        "attack_non_effective":[],
        "defense_effective":[],
        "defese_non_effective":[],
        "inmune_from":[],
        "inmune_by":[]
    }
    return dictionary


def load_csv():
    with open('/home/markel/Documentos/Programacion/Python/Sar/Practica General 3/Pokémon Type Chart.csv') as File:
        reader = csv.reader(File, delimiter=',', quotechar=',',
                            quoting=csv.QUOTE_MINIMAL)

        iteration = 1
        for row in reader:
#            print(row)
            if (row[0] == "NULL"):
                for i in range(len(row)):
                    type_dict_list.append(create_type_dictionary())
                    type_dict_list[i]["type_name"] = row[i]
                continue
            if (row[0] == "COLOR"):
                for i in range(1,len(row)):
                    type_dict_list[i]["type_color"] = row[i]
                continue
 
            for i in range(1,len(row)):
                if(row[i] == "2×"):
#                    print("2x")
                    type_dict_list[iteration]["attack_effective"].append(type_dict_list[i]["type_name"])
                    type_dict_list[i]["defese_non_effective"].append(type_dict_list[iteration]["type_name"])
                elif(row[i] == "½×"):
#                    print("1/2x")
                    type_dict_list[iteration]["attack_non_effective"].append(type_dict_list[i]["type_name"])
                    type_dict_list[i]["defense_effective"].append(type_dict_list[iteration]["type_name"])
                elif (row[i] == "0×"):
#                    print("0x")
                    type_dict_list[iteration]["inmune_by"].append(type_dict_list[i]["type_name"])
                    type_dict_list[i]["inmune_from"].append(type_dict_list[iteration]["type_name"])
                else:
#                    print("1x")
                     pass
            iteration +=1
        
        for elem in type_dict_list:
            print(elem)
            print(elem["type_name"], "  ", elem["type_color"])
            print("Effective attacks against: " , elem["attack_effective"])
            print("Non effective attacks against: " , elem["attack_non_effective"])
            print("Effective defense against: " , elem["defense_effective"])
            print("Non effective defense against: " , elem["defese_non_effective"])
            print("Inmune to: " , elem["inmune_from"])
            print("Inmunized by: " , elem["inmune_by"])
            print("")


# Proceso general
load_csv()
result = ""
top = Element('type_data')
for i in range(1,len(type_dict_list)):
    for j in range(i,len(type_dict_list)):
        child = SubElement(top, 'type_combination')
        
        vulnerability = SubElement(child, 'vulnerability')
        resistant = SubElement(child, 'resistence')
        inmune = SubElement(child, 'inmunity')

        # attack_x4 = SubElement(child, 'group', {'class':'attack_x4'})
        # attack_x2 = SubElement(child, 'group', {'class':'attack_x2'})
        # attack_x1_2 = SubElement(child, 'group', {'class':'attack_x1/2'})
        # attack_x1_4 = SubElement(child, 'group', {'class':'attack_x1/4'})
        # attack_inmune = SubElement(child, 'group', {'class':'attack_inmune'})
    # aux = ""
    # aux += "case '"+ type_dict_list[i]['type_name'] +"':\n\t $color = '" + type_dict_list[i]['type_color'] + "';\n\tbreak;"
    # SubElement(top, 'type',{'name' : type_dict_list[i]['type_name'],'color' : type_dict_list[i]['type_color']})
    # result +=aux

        if(type_dict_list[i]['type_name'] == type_dict_list[j]['type_name']):
            child.set('elem1', type_dict_list[i]['type_name'])
            child.set('elem2', "NONE")
        else:
            child.set('elem1', type_dict_list[i]['type_name'])
            child.set('elem2', type_dict_list[j]['type_name'])



        # Efectividad x4
        for elem1 in type_dict_list[i]['defese_non_effective']:
            for elem2 in type_dict_list[j]['defese_non_effective']:
                if elem1 == elem2 :
                    types = SubElement(vulnerability, "type" , {'name' : elem1})
                    
        # Efectividad x1/4
        for elem1 in type_dict_list[i]['defense_effective']:
            for elem2 in type_dict_list[j]['defense_effective']:
                if elem1 == elem2 :
                    types = SubElement(resistant, "type" , {'name' : elem1})

        # Inmunidad
        for elem1 in type_dict_list[i]['inmune_from']:
            types = SubElement(inmune, "type" , {'name' : elem1})
        for elem1 in type_dict_list[j]['inmune_from']:
            flag = True
            for elem2 in type_dict_list[i]['inmune_from']:
                if elem1 == elem2 :
                    flag = False
            if(flag):
                types = SubElement(inmune, "type" , {'name' : elem1})

    #     #     #  Efectividad x2
    #     #     for elem1 in type_dict_list[i]['attack_effective']:
    #     #         types = SubElement(attack_x2, "type" , {'name' : elem1})
    #     #     for elem1 in type_dict_list[j]['attack_effective']:
    #     #         flag = True
    #     #         for elem2 in type_dict_list[i]['attack_effective']:
    #     #             if elem1 == elem2 :
    #     #                 flag  = False
    #     #         if(flag):
    #     #             types = SubElement(attack_x2, "type" , {'name' : elem1})

    #     #     # Efectividad x1/2
    #     #     for elem1 in type_dict_list[i]['attack_non_effective']:
    #     #         types = SubElement(attack_x1_2, "type" , {'name' : elem1})
    #     #     for elem1 in type_dict_list[j]['attack_non_effective']:
    #     #         flag = True
    #     #         for elem2 in type_dict_list[i]['attack_non_effective']:
    #     #             if elem1 == elem2 :
    #     #                 flag  = False
    #     #         if(flag):
    #     #             types = SubElement(attack_x1_2, "type" , {'name' : elem1})


## TODO SACAR RESISTENCIAS Y DEBILIDADES DE CADA COMBINACION A CADA TIPO INDIVIDUAL

with open('type_result.xml', 'w') as file:
    file.write(prettyXML.prettify(top))
#
# print( prettyXML.prettify(top))
