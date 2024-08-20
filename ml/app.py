from flask import Flask, jsonify, request

app = Flask(__name__)

# Globally set the headers for the responses
@app.after_request
def apply_caching(response):
    response.headers['Access-Control-Allow-Origin'] = '*'
    response.headers['Content-Type'] = 'application/json'
    return response


@app.route('/api/get/deals/<search_keyword>', methods=['GET'])
def get_deals(search_keyword):

    api_token = request.headers.get("api_token")

    auth = False

    # check in database if api_token exists
    if api_token:
        auth = True


    if auth:
        # Make this into an external file function that returns the transformed data
        # That file would include the fetching the data from e-commerce APIs
        data = {
            "message": "Success",
            "keyword": search_keyword,
        }

        return jsonify(data), 200

    else:
        data = {
            "message": "Unauthorized"
        }

        return jsonify(data), 401

# Catch All Unknown/Unspecified Routes
@app.route('/', defaults={'path': ''})
@app.route('/<path:path>')
def not_found(path):
    return jsonify({
        "message": "Not Found"
    }), 404


if __name__ == "__main__":
    app.run(debug=True)
