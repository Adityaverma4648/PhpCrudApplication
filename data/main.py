import numpy as np
import pandas as pd
import json
import csv


# Function to convert a CSV to JSON
# Takes the file paths as arguments
# def make_json(csvFilePath, jsonFilePath):

#     # create a dictionary
#     data = {}

#     # Open a csv reader called DictReader
#     with open(csvFilePath, encoding='utf-8') as csvf:
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
#     with open(jsonFilePath, 'w', encoding='utf-8') as jsonf:
#         jsonf.write(json.dumps(data, indent=4))


def make_json(csvFilePath, jsonFilePath):
    jsonArray = []

    # read csv file
    with open(csvFilePath, encoding='cp1252') as csvf:
        # load csv file data using csv library's dictionary reader
        csvReader = csv.DictReader(csvf)

        # convert each csv row into python dict
        for row in csvReader:
            # add this python dict to json array
            jsonArray.append(row)

    # convert python jsonArray to JSON String and write to file
    with open(jsonFilePath, 'w', encoding='cp1252') as jsonf:
        jsonString = json.dumps(jsonArray, indent=4)
        jsonf.write(jsonString)


# Driver Code


# Decide the two file paths according to your
# computer system
csvFilePath = r'C:\xampp\htdocs\PhpCrudApplication\data\blood-banks.csv'
jsonFilePath = r'C:\xampp\htdocs\PhpCrudApplication\data\blood-banks.json'

# Call the make_json function
make_json(csvFilePath, jsonFilePath)
