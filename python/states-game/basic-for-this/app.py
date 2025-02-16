import pandas

data = pandas.read_csv("weather_data.csv")

# print(data)
# print(type(data))

temp_list = data["Temp"].to_list()

print(data[data.Condition == "Sunny"])
print(data[data.Temp == data.Temp.max()])

monday = data[data.Day == "Monday"]

monday_temp = monday.Temp[0]
print(monday_temp)
monday_temp_F = monday_temp * 9/5 + 32
print(monday_temp_F)


# data dictionary
data_dict = {
    "students": ["Suna", "Mona",  "Tuere", "Wedad", "Thuca" ],
    "condition": ["Sick", "Sick", "Hot", "Healthy", "Crazy"]
}
data_students = pandas.DataFrame(data_dict)
data_students.to_csv("students.csv")
