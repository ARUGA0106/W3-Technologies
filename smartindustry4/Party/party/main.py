import streamlit as st
import pandas as pd
import numpy as np

from sklearn.externals import joblib
from sklearn.preprocessing import StandardScaler, OneHotEncoder
from sklearn.compose import ColumnTransformer
from sklearn.pipeline import Pipeline
from sklearn.linear_model import LogisticRegression

# Paths to your saved model and preprocessing objects
model_path = 'C:\Users\PC\party\CR\logistic_model.pkl'
scaler_path = 'C:\Users\PC\party\CR\scaler.pkl'
encoder_path = 'C:\Users\PC\party\CR\encoder.pkl'

# Loading trained model (logistic_model) and preprocessing objects
logistic_model = joblib.load(model_path)
scaler = joblib.load(scaler_path)
encoder = joblib.load(encoder_path)

# Define function for data preprocessing
def preprocess_input(input_data):
    # Convert input data to DataFrame
    input_df = pd.DataFrame(input_data, index=[0])

    # Perform preprocessing steps similar to what you did during training
    # Example: One-hot encoding for categorical variables
    categorical_cols = ['Gender', 'Marital', 'Living_Status']
    input_df_encoded = pd.get_dummies(input_df, columns=categorical_cols)

    # Example: Scaling numerical variables
    numerical_cols = ['Location', 'Age', 'Attendance', 'Interest', 'Sociality', 'Study_hours', 'Academics']
    input_df_scaled = scaler.transform(input_df_encoded[numerical_cols])
    input_df_encoded[numerical_cols] = input_df_scaled

    return input_df_encoded

# Define the Streamlit app function
def main():
    st.title('Party Invitation Predictor')

    # Input fields for user details
    st.subheader('Enter Your Details')
    gender = st.radio('Gender', ['Male', 'Female'])
    location = st.slider('Location Distance (km)', 0.0, 50.0, 25.0)
    age = st.slider('Age', 18, 30, 25)
    attendance = st.slider('Previous Party Attendance', 0, 10, 5)
    interest = st.slider('Interest Level (1-10)', 1, 10, 5)
    sociality = st.slider('Social Group Size', 1, 20, 10)
    study_hours = st.slider('Weekly Study Hours', 1, 40, 20)
    academics = st.slider('Academic Performance (0-100)', 50, 100, 75)
    marital_status = st.selectbox('Marital Status', ['Single', 'Married', 'Divorced'])
    living_status = st.selectbox('Living Status', ['With parents', 'Ghetto', 'Hostel'])

    # Predict button
    if st.button('Predict Invitation Status'):
        # Create dictionary with user inputs
        input_data = {
            'Gender': gender,
            'Location': location,
            'Age': age,
            'Attendance': attendance,
            'Interest': interest,
            'Sociality': sociality,
            'Study_hours': study_hours,
            'Academics': academics,
            'Marital': marital_status,
            'Living_Status': living_status
        }

        # Preprocess input data
        input_df = preprocess_input(input_data)

        # Make prediction using the loaded model
        prediction = logistic_model.predict(input_df)

        # Display prediction result
        if prediction[0] == 1:
            st.success('You are Invited!')
        else:
            st.warning('You are Not Invited.')

# Run the Streamlit app
if __name__ == '__main__':
    main()
