from flask import Flask, request, jsonify
from tf_idf import get_text, scrape_google, tf_idf_analysis

app = Flask(__name__)

@app.route('/get_text')
def get_text_endpoint():
    url = request.args.get('url')
    text = get_text(url)
    return jsonify(text=text)

@app.route('/scrape_google')
def scrape_google_endpoint():
    query = request.args.get('query')
    links = scrape_google(query)
    return jsonify(links=links)

@app.route('/tf_idf_analysis')
def tf_idf_analysis_endpoint():
    keyword = request.args.get('keyword')
    result = tf_idf_analysis(keyword)
    return jsonify(result=result)

if __name__ == '__main__':
    app.run(debug=True)
