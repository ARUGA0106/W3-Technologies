from django.http import HttpResponse
from django.template import loader
from member.models import Group  # Assuming your model is named Group, not Member
from django.shortcuts import render
import csv
from .models import Group

def masterpage(request):
    # Logic for your masterpage
    return render(request, 'masterpage.html')

def group_goals(request):
    # Your logic for the group goals page
    return render(request, 'group_goals.html')

def members(request):
    members = Group.objects.all()  # Retrieve all members from the database
    return render(request, 'members.html', {'members': members})

def download_csv(request):
    # Create the HttpResponse object with the appropriate CSV header.
    response = HttpResponse(content_type='text/csv')
    response['Content-Disposition'] = 'attachment; filename="group_info.csv"'

    writer = csv.writer(response)
    # Write the header row
    writer.writerow(['First Name', 'Last Name', 'Registration Number', 'Gender', 'Project'])

    # Write data rows
    groups = Group.objects.all()
    for group in groups:
        writer.writerow([group.firstname, group.lastname, group.registration_number, group.get_gender_display(), group.project])

    return response
