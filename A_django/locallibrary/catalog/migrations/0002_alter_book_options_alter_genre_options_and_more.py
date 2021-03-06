# Generated by Django 4.0.4 on 2022-06-03 09:07

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('catalog', '0001_initial'),
    ]

    operations = [
        migrations.AlterModelOptions(
            name='book',
            options={'ordering': ['author', 'title']},
        ),
        migrations.AlterModelOptions(
            name='genre',
            options={'ordering': ['name']},
        ),
        migrations.AlterField(
            model_name='book',
            name='summary',
            field=models.TextField(help_text="Entrez une brève description de l'ouvrage.", max_length=1000),
        ),
    ]
