from django.db import models


# Create your models here.

class Group(models.Model):
    # Group member details

    firstname = models.CharField(max_length=150)
    lastname = models.CharField(max_length=150)
    registration_number = models.CharField(max_length=120)
    gender_choices = [
        ('M', 'Male'),
        ('F', 'Female'),
        ('O', 'Other'),
    ]
    gender = models.CharField(max_length=1, choices=gender_choices)

    # Project details
    project = models.CharField(max_length=100)

    def __str__(self):
        return f"{self.firstname} {self.lastname}"


