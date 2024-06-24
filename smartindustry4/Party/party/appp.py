import streamlit as st
import numpy as np
import joblib
import os

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

# Define the file paths for the trained model and scaler
model_path = r'C:/Windows/System32/party/CR/random_forest_model.pkl'
scaler_path = r'C:/Windows/System32/party/CR/scaler.pkl'

# Function to load model and scaler
def load_model_and_scaler():
    rf_model = joblib.load(model_path)
    scaler = joblib.load(scaler_path)
    return rf_model, scaler

# Function to preprocess input data and make predictions
def predict_maintenance_days(model, scaler, power, current, voltage, pressure, conductivity):
    # Scale the input data using the loaded scaler
    input_data = np.array([[power, current, voltage, pressure, conductivity]])
    input_data_scaled = scaler.transform(input_data)
    
    # Predict using the loaded model
    predicted_days = model.predict(input_data_scaled)
    return predicted_days[0]

# Logic to determine the state of the machine
def determine_machine_state(power, current, voltage, pressure, conductivity):
    if (current < 2.5 or current > 3.5) or (voltage < 210 or voltage > 230) or (pressure < 1.5 or pressure > 2.5):
        return "Unstable"
    else:
        return "Stable"

# Streamlit interface
def main():
    st.title('Maintenance Days Prediction')
    st.write('Enter the following parameters to predict maintenance days and the state of the machine:')
    
    # Input fields for user to enter data
    power = st.number_input('Power (KW)', min_value=0.0, max_value=200.0, value=100.0)
    current = st.number_input('Current (mA)', min_value=0.0, max_value=10.0, value=3.0)
    voltage = st.number_input('Voltage (V)', min_value=0.0, max_value=300.0, value=220.0)
    pressure = st.number_input('Pressure', min_value=0.0, max_value=5.0, value=2.0)
    conductivity = st.number_input('Conductivity', min_value=0.0, max_value=200.0, value=100.0)
    
    # Load model and scaler
    rf_model, scaler = load_model_and_scaler()
    
    # Predict button
    if st.button('Predict'):
        # Perform prediction
        prediction = predict_maintenance_days(rf_model, scaler, power, current, voltage, pressure, conductivity)
        state = determine_machine_state(power, current, voltage, pressure, conductivity)
        
        st.success(f'Predicted maintenance days: {prediction}')
        st.info(f'Machine state: {state}')
        st.write("---")
    st.write("© 2024 DIT Smart Industries 4.0+  Prediction System. All rights reserved.")
    st.write("For feedback or inquiries, please contact us at [arugagodwin@gmail.com](mailto:your_email@example.com).")


if __name__ == '__main__':
    main()





