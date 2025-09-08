from django.db import models

# Create your models here.

class marca(models.Model):
    nombre = models.CharField(max_length=100)
    descripcion = models.TextField()

class categoria(models.Model):
    nombre = models.CharField(max_length=100)
    descripcion = models.TextField()

class producto(models.Model):
    nombre = models.CharField(max_length=100)
    precio = models.DecimalField(max_digits=10, decimal_places=2)
    stock = models.IntegerField()
    marca_id = models.ForeignKey(marca, on_delete=models.CASCADE)
    categoria_id = models.ForeignKey(categoria, on_delete=models.CASCADE)
    fecha_creacion = models.DateTimeField(auto_now_add=True)
    activo = models.BooleanField(default=True)
