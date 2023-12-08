import socket
import threading

def receive_messages():
    while True:
        try:
            message = client_socket.recv(1024).decode()
            print(message)
        except:
            print("Ошибка при получении сообщения.")
            break

def send_messages():
    while True:
        message = input()
        client_socket.send(message.encode())

if __name__ == "__main__":
        host, port = '127.0.0.1', 8889
        client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        server_address = (host, port) 

        client_socket.connect(server_address)

        username = input("Введите ваше имя: ")
        client_socket.send(username.encode())

        receive_thread = threading.Thread(target=receive_messages)
        receive_thread.start()

        send_thread = threading.Thread(target=send_messages)
        send_thread.start()
