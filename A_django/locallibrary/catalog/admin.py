from django.contrib import admin
from catalog.models import Author, Genre, Book, BookInstance

class AuthorAdmin(admin.ModelAdmin):
  pass

class BookAdmin(admin.ModelAdmin):
  pass

admin.site.register(Book)
admin.site.register(Author, AuthorAdmin)
admin.site.register(Genre)
admin.site.register(BookInstance)
