from flask import Flask, send_file, send_from_directory
import os

app = Flask(__name__)

@app.route('/')
def index():
    return send_file('index.html')

@app.route('/<path:filename>')
def serve_static(filename):
    root_dir = os.path.dirname(os.path.abspath(__file__))
    return send_from_directory(os.path.join(root_dir), filename)

if __name__ == '__main__':
    import argparse

    parser = argparse.ArgumentParser(description='Simple web server')
    parser.add_argument('--port', type=int, default=8888, help='Port number (default is 8888)')
    args = parser.parse_args()

    port = args.port
    app.run(port=port)
