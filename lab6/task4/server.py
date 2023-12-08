import socket
import threading

def handle_client(client_socket, username):
    try:
        while True:
            message = client_socket.recv(1024).decode()
            if not message:
                break
            broadcast(f"{username}: {message}")
    except:
        pass
    finally:
        client_socket.close()
        usernames.remove(username)
        broadcast(f"{username} вышел из чата.")

def broadcast(message):
    for client in clients:
        try:
            client.send(message.encode())
        except:
            clients.remove(client)

if __name__ == "__main__":
    host, port = '127.0.0.1', 8889
    server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server_address = (host, port)

    server_socket.bind(server_address)
    server_socket.listen(5)

    print(f"Сервер запущен на {server_address[0]}:{server_address[1]}")

    clients = []
    usernames = []

    while True:
        client_socket, client_address = server_socket.accept()
        print(f"Подключено клиентом: {client_address}")

        username = client_socket.recv(1024).decode()
        usernames.append(username)
        clients.append(client_socket)

        broadcast(f"{username} присоединился к чату.")

        client_handler = threading.Thread(target=handle_client, args=(client_socket, username))
        client_handler.start()
