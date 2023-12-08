import socket


class Server:
    def __init__(self, host, port):
        self.server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        self.host = host
        self.port = port
        
    def connect(self):
        self.server_socket.bind((self.host, self.port))
        self.server_socket.listen()
        
    def accept_connection(self):
        self.client_socket, _ = self.server_socket.accept()
        
    def get_message(self):
        data = self.client_socket.recv(1024)
        print(f"Получено от клиента: {data.decode()}")
    
    def send_message(self):
        message = "Hello, client"
        self.client_socket.sendall(message.encode())    
        
    def close_connection(self):
        self.client_socket.close()
        self.server_socket.close()
        
        
def main():
    server = Server(host="127.0.0.1", port=9871)
    server.connect()
    server.accept_connection()
    server.get_message()
    server.send_message()
    server.close_connection()
    
if __name__ == "__main__":
    main()
