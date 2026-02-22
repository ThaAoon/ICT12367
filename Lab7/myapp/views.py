from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
def index(request):
    return HttpResponse("<h1>ICT12367 SPU</h1>")

def about(request):
    return HttpResponse("<h1>เกี่ยวกับเรา</h1>")

def form(request):
    return render(request, 'form.html')

def contact(request):
    return HttpResponse("<h1>รหัสนักศึกษา 68025930 ชื่อ-นามสกุล นายเพชรพิสุทธิ์ ติลลักษณ์</h1>")