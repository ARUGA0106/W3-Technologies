import streamlit as st
import streamlit as st
import numpy as np
import joblib
import os


# Function to determine maintenance days based on provided logic
def determine_maintenance_days(power, current, voltage, pressure, conductivity):
    if (current < 2.5 or current > 3.5):
        return 40  # High maintenance days
    elif (voltage < 210 or voltage > 230):
        return 35  # Moderate maintenance days
    elif (pressure < 1.5 or pressure > 2.5):
        return 30  # Low maintenance days
    elif (conductivity < 80 or conductivity > 120):
        return 25  # Very low maintenance days
    else:
        return 20  # Minimum maintenance days

# Logic to determine the state of the machine
def determine_machine_state(maintenance_days):
    if maintenance_days > 20:
        return "Stable"
    else:
        return "Unstable"

# Streamlit interface
def main():
 # Adding header and image
    st.set_page_config(page_title="Maintenance Prediction System", layout="wide")
    st.header('DIT Smart Industries 4.0+')
    
    st.write("""
    Welcome to DIT Smart industries 4.0+ Maintenance Prediction System. 
    This tool helps you predict the number of maintenance days required for your machine based on various parameters.
    Enter the parameters below to get started.
    """)
    st.title('Equipment Maintenance Status Prediction.')
    st.write('Enter the following parameters to predict maintenance days and the state of the machine:')
    
    # Input fields for user to enter data
    power = st.number_input('Power consumed/min (KW)', min_value=0.0, max_value=200.0, value=100.0)
    current = st.number_input('Current deviation (mA)', min_value=0.0, max_value=10.0, value=3.0)
    voltage = st.number_input('Drift Voltage (V)', min_value=0.0, max_value=300.0, value=220.0)
    pressure = st.number_input('Pressure (hydraulic valve)', min_value=0.0, max_value=5.0, value=2.0)
    conductivity = st.number_input('Conductivity in ohms/sec/mA', min_value=0.0, max_value=200.0, value=100.0)
    
    # Predict button
    if st.button('Predict'):
        # Perform prediction
        prediction = determine_maintenance_days(power, current, voltage, pressure, conductivity)
        state = determine_machine_state(prediction)
        
        st.success(f'Maintenance due days: {prediction}')
        st.info(f'Machine state: {state}')
        # Add footer with copyright and feedback
    st.write("---")
    st.write("© 2024 DIT Smart Industries 4.0+  Prediction System. All rights reserved.")
    st.write("For feedback or inquiries, please contact us at [arugagodwin@gmail.com](mailto:your_email@example.com).")


if __name__ == '__main__':
    main()
