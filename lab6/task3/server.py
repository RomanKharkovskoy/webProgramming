import socket

def read_file(file_path):
    try:
        with open(file_path, 'r') as file:
            return file.read()
    except FileNotFoundError:
        return "Файл не найден"

def create_http_response(content):
    response = "HTTP/1.1 200 OK\r\n"
    response += "Content-Type: text/html\r\n"
    response += "\r\n"
    response += content
    return response

def start_server(host, port, file_path):
    server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server_socket.bind((host, port))
    server_socket.listen(1)
    print(f"Сервер запущен по адресу {host}:{port}")

    while True:
        client_socket, client_address = server_socket.accept()
        print(f"Подключение: {client_address}")

        data = client_socket.recv(1024).decode('utf-8')
        if not data:
            break

        request_method = data.split(' ')[0]
        if request_method == "GET":
            content = read_file(file_path)
            response = create_http_response(content)
            client_socket.sendall(response.encode('utf-8'))

        client_socket.close()

    server_socket.close()

if __name__ == "__main__":
    host, port = '127.0.0.1', 9873
    file_path = 'index.html' 

    start_server(host, port, file_path)
