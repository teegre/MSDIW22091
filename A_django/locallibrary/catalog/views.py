from django.shortcuts import render
from .models import Book, Author, BookInstance, Genre
from django.views import generic

def index(request):
  """ View function for home page """
  num_books = Book.objects.all().count()
  num_instances = BookInstance.objects.all().count
  num_instances_available = BookInstance.objects.filter(status__exact='d').count()
  num_authors = Author.objects.count()
  num_genres = Genre.objects.count()

  context = {
    'num_books': num_books,
    'num_instances': num_instances,
    'num_instances_available': num_instances_available,
    'num_authors': num_authors,
    'num_genres': num_genres,
  }

  return render(request, 'catalog/index.html', context=context)

class BookListView(generic.ListView):
  model = Book
  context_object_name = 'booklist'
  template_name = 'catalog/booklist.html'

  def get_queryset(self):
    return Book.objects.all()

class BookDetailView(generic.DetailView):
  model = Book
