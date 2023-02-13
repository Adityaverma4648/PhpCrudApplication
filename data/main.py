import numpy as np
import pandas as pd
import json
import csv


df = pd.read_csv(".\blood-banks.csv")

print(df)

# def make_json(csvFilePath, jsonFilePath):

#     # create a dictionary
#     data = {}

#     # Open a csv reader called DictReader
#     with open(csvFilePath, encoding='cp1252') as csvf:
#         csvReader = csv.DictReader(csvf)

#         # Convert each row into a dictionary
#         # and add it to data
#         for rows in csvReader:

#             # Assuming a column named 'No' to
#             # be the primary key
#             key = rows['Sr No']
#             data[key] = rows

#     # Open a json writer, and use the json.dumps()
#     # function to dump data
#     with open(jsonFilePath, 'w', encoding='cp1252') as jsonf:
#         jsonf.write(json.dumps(data, indent=4))


# def make_json(csvFilePath, jsonFilePath):
#     jsonArray = []

#     with open(csvFilePath, encoding='cp1252') as csvf:
#         csvReader = csv.DictReader(csvf)


#         for row in csvReader:
#             jsonArray.append(row)

#     with open(jsonFilePath, 'w', encoding='cp1252') as jsonf:
#         jsonString = json.dumps(jsonArray, indent=4)
#         jsonf.write(jsonString)


# csvFilePath = r'C:\xampp\htdocs\PhpCrudApplication\data\blood-banks.csv'
# jsonFilePath = r'C:\xampp\htdocs\PhpCrudApplication\data\blood-banks.json'


# make_json(csvFilePath, jsonFilePath)
