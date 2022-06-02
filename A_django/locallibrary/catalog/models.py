""" Catalog models """

import uuid
from django.db import models
from django.urls import reverse


class Genre(models.Model):
  """ Book genre """
  name = models.CharField(max_length=200, help_text='Entrez un genre littéraire (ex: Science fiction.)')
  
  def __str__(self):
    return self.name

class Book(models.Model):
  """ A book """
  title = models.CharField(max_length=200)
  author = models.ForeignKey('Author', on_delete=models.SET_NULL, null=True)
  summary = models.TextField(max_length=1000, help_text='Entrez une brève description du livre.')
  isbn = models.CharField(
    'ISBN',
    max_length=13,
    help_text='N° ISBN à 13 caractères. <a href="https://www.isbn-international.org/content/what-isbn">ISBN</a>'
  )
  genre = models.ManyToManyField(Genre, help_text='Sélectionner un genre pour ce livre.')

  def __str__(self):
    """ Book representation """
    return self.title

  def get_absolute_url(self):
    """ Absolute URL of book detail """
    return reverse('book-detail', args=[str(self.id)])

class BookInstance(models.Model):
  """ Instance of a book that can be borrowed """
  id = models.UUIDField(primary_key=True, default=uuid.uuid4, help_text='Identifiant unique pour ce livre à la bibliothèque.')
  book = models.ForeignKey('Book', on_delete=models.SET_NULL, null=True)
  imprint = models.CharField(max_length=200)
  due_back = models.DateField(null=True, blank=True)

  LOAN_STATUS = (
    ('m', 'Maintenance'),
    ('p', 'Prêté'),
    ('d', 'Disponible'),
    ('r', 'Réservé'),
  )

  status = models.CharField(
    max_length=1,
    choices=LOAN_STATUS,
    blank=True,
    default='m',
    help_text='Disponibilité du livre.'
  )

  def __str__(self):
    """ Book instance representation """
    return f'{self.id} ({self.book.title})'

  class Meta:
    ordering = ['due_back']

class Author(models.Model):
  """ An author """
  first_name = models.CharField(max_length=100)
  last_name = models.CharField(max_length=100)
  date_of_birth = models.DateField(null=True, blank=True)
  date_of_death = models.DateField('Died', null=True, blank=True)

  class Meta:
    ordering = ['last_name', 'first_name']

  def get_absolute_url(self):
    """ Author's absolute URL """
    return reverse('author-detail', args=[str(self.id)])

  def __str__(self):
    """ Author representation """
    return f'{self.last_name}, {self.first_name}'
