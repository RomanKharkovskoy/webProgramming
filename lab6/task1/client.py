import socket


class Client:
    def __init__(self, host, port):
        self.client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        self.host = host
        self.port = port
        
    def connect(self):
        self.client_socket.connect((self.host, self.port))
    
    def send_message(self):
        message = "Hello, server"
        self.client_socket.sendall(message.encode())
        
    def get_message(self):
        data = self.client_socket.recv(1024)
        print(f"Получено от сервера: {data.decode()}")
        
    def close_connection(self):
        self.client_socket.close()
        
        
def main():
    client = Client(host="127.0.0.1", port=9871)
    client.connect()
    client.send_message()
    client.get_message()
    client.close_connection()

if __name__ == "__main__":
    main()
