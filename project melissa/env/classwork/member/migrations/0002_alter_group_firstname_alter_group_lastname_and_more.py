# Generated by Django 5.0.6 on 2024-05-15 10:43

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('member', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='group',
            name='firstname',
            field=models.CharField(max_length=150),
        ),
        migrations.AlterField(
            model_name='group',
            name='lastname',
            field=models.CharField(max_length=150),
        ),
        migrations.AlterField(
            model_name='group',
            name='registration_number',
            field=models.CharField(max_length=120),
        ),
    ]
