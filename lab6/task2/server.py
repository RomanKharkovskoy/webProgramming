import socket

def calculate_trapezoid_area(a, b, h):
    return 0.5 * (a + b) * h

def start_server():
    host, port = '127.0.0.1', 9872
    server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server_socket.bind((host, port))
    server_socket.listen(1)
    print("Сервер запущен. Ожидание подключения...")

    while True:
        conn, addr = server_socket.accept()
        print("Подключился:", addr)

        data = conn.recv(1024)
        if not data:
            break

        params = data.decode().split(",")
        a, b, h = map(float, params)

        result = calculate_trapezoid_area(a, b, h)
        conn.sendall(str(result).encode())

        conn.close()
        print("Отправлен результат:", result)

if __name__ == "__main__":
    start_server()
