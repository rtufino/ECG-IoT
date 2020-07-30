# Proyecto: ECG IoT
# Autora: Catalina Andrade
# Version: 1.0.0
# Historial: 
#     v 0.0.1    Comunicación con Arduino
#     v 0.0.2    Guarda archivo
#     v 0.0.3    Guardar en Base de Datos
#     v 1.0.0    Guardar en Base de DAtos de Internet

# Referencias: 
# https://www.youtube.com/watch?v=OleCp_TAXC8
# https://pypi.org/project/pyserial/
# https://parzibyte.me/blog/2018/09/18/python-3-mysql-crud-ejemplos-conexion/


import serial
import pymysql
import sys

print("-- ECG IoT --")
print("Autora: Catalina Andrade")
print("Julio 2020")

# Configura la conexión con la base de datos
try:
    # Credenciales para conección en Internet
    conexion = pymysql.connect(host='ec2-18-191-200-126.us-east-2.compute.amazonaws.com',
                            user='ecgdb',
                            password='H1tZWLU9ZhO1LhvJ',
                            db='ecg')
    # Credenciales para conexión local
    #conexion = pymysql.connect(host='localhost',
    #                         user='root',
    #                         password='',
    #                         db='ecg')
    print("Conexión con BDD correcta")
    conexion_bdd = True

except (pymysql.err.OperationalError, pymysql.err.InternalError) as e:
    print("Error al conectar con BDD: ", e)
    quit()

# Configura el puerto serial
try:
    com3 = serial.Serial('COM3','9600')
    print("Conexión con COM3 correcta")
except:
    print("Error al conectar con COM3")
    quit()

# Obtiene un cursor
cursor = conexion.cursor()

# sentencia SQL para almacenar los datos
sql = "INSERT INTO senal(valor) VALUES (%s);"

# Guarda 1000 datos
muestras = 1000
cont = 0
print("Almacenando", muestras, "muestras...")
while cont < muestras:
    # lee desde el puerto serial
    dato = com3.readline()
    # transforma a texto
    texto = "".join( chr(x) for x in bytearray(dato) ).strip()
    try:
        # se transforma a entero
        valor = int(texto)
        # se alamcena el dato en la BDD
        cursor.execute(sql,(valor))
        conexion.commit()
    except (pymysql.err.OperationalError, pymysql.err.InternalError) as e:
        print("Error:", e)
    except:
        print('Otro error')
    cont += 1
    
# Cierra conexion con la BDD
conexion.close()

print("Programa finalizado")