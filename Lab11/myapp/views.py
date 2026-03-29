from django.shortcuts import render, redirect
from django.http import HttpResponse
from myapp.models import Person

# Create your views here.
def index(request):
    person = Person.objects.all()
    context = {
        'person': person
    }
    return render(request, 'index.html', context)

def about(request):
    return render(request, 'about.html')

def form(request):
    if request.method == 'POST':
        name = request.POST.get('name')
        age = request.POST.get('age')
        person = Person(name=name, age=age)
        person.save()
        return redirect('index')
    return render(request, 'form.html')

# def form(request):
#     return render(request, 'form.html')
