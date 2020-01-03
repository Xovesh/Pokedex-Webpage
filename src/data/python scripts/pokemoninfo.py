import pandas as pd

data = pd.read_csv("./../csv/pokemon.csv")

print(data.columns)
# Lista habilidades
# print(data.abilities.unique())

maximum = 0
p = ""
for i in data.abilities.unique():
    if len(i.split(",")) > maximum:
        maximum = len(i.split(","))
        p = i
print(maximum)
print(p)

unique = set()
for i in data.abilities.unique():
    t = i.split("'")
    for j in t:
        if j not in "[], ":
            unique.add(j)
    # print(t)
print(unique)

# Lista tipos

t1 = data.type1.unique()
t2 = data.type2.unique()

print(list(set(t1).union(set(t2))))

# Lista clasificacion

print(list(data.classfication.unique()))

