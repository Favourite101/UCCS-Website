from django.shortcuts import render

def home(request):
    return render(request, 'index.html')

def gallery(request):
    return render(request, 'photo-gallery.html')

def contact(request):
    return render(request, 'contact.html')
