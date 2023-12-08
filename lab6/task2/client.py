import socket

def get_user_input():
    a = float(input("Введите длину основания a: "))
    b = float(input("Введите длину основания b: "))
    h = float(input("Введите высоту h: "))
    return a, b, h

def start_client():
    host, port = '127.0.0.1', 9872
    client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    client_socket.connect((host, port))

    params = get_user_input()
    message = ",".join(map(str, params))
    client_socket.sendall(message.encode())

    data = client_socket.recv(1024)
    result = data.decode()
    print(f"Площадь трапеции: {result}")

    client_socket.close()

if __name__ == "__main__":
    start_client()
