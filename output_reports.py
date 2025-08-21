import matplotlib.pyplot as plt
import numpy as np
import pandas as pd

# Generate sample data
days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
patients = [12, 19, 7, 15, 20, 10, 5]

# 1. Line Chart
plt.plot(days, patients, marker="o", color="blue")
plt.title("Patient Visits Per Day")
plt.xlabel("Days")
plt.ylabel("Number of Patients")
plt.show()

# 2. Bar Chart
departments = ["General", "Pediatrics", "Dental", "Cardiology", "ENT"]
patients_dept = [50, 30, 20, 25, 15]
plt.bar(departments, patients_dept, color="orange")
plt.title("Patients by Department")
plt.xlabel("Department")
plt.ylabel("Number of Patients")
plt.show()

# 3. Pie Chart
diseases = ["Flu", "Diabetes", "Hypertension", "Asthma", "Others"]
counts = [40, 25, 20, 10, 15]
plt.pie(counts, labels=diseases, autopct="%1.1f%%", startangle=140)
plt.title("Disease Distribution")
plt.show()

# 4. Histogram
ages = np.random.randint(1, 90, 100)
plt.hist(ages, bins=10, color="green", edgecolor="black")
plt.title("Age Distribution of Patients")
plt.xlabel("Age")
plt.ylabel("Number of Patients")
plt.show()

# 5. Area Chart
months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"]
appointments = [100, 120, 90, 150, 200, 180]
plt.fill_between(months, appointments, color="skyblue", alpha=0.4)
plt.plot(months, appointments, color="blue", marker="o")
plt.title("Monthly Appointments")
plt.xlabel("Months")
plt.ylabel("Appointments")
plt.show()

# 6. Scatter Plot (simulating locations with random coords)
np.random.seed(0)
x_coords = np.random.randint(1, 100, 20)
y_coords = np.random.randint(1, 100, 20)
plt.scatter(x_coords, y_coords, color="red", marker="x")
plt.title("Patient Distribution by Location (Simulated)")
plt.xlabel("Longitude")
plt.ylabel("Latitude")
plt.show()
