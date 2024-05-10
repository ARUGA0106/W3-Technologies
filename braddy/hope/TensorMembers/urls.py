from django.urls import path
from . import views

urlpatterns = [
    path('TensorMembers/', views.members, name='TensorMembers'),
]
