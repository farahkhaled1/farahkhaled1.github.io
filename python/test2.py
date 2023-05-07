import requests
import urllib
import pandas as pd
from requests_html import HTML
from requests_html import HTMLSession
import numpy as np
from fake_useragent import UserAgent
import re
from urllib.request import Request, urlopen
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.feature_extraction.text import CountVectorizer
import math
from bs4 import BeautifulSoup
from flask import Flask
from nltk.data import url2pathname
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
import pandas as pd
from nltk.stem.porter import *
from nltk.stem.snowball import SnowballStemmer
app = Flask(__name__)

@app.route('/tfidf')

def index():



 def get_text(url):

    try:
        req = Request(url , headers={'User-Agent': 'Mozilla/5.0'})
        webpage = urlopen(req,timeout=5).read()
        soup = BeautifulSoup(webpage, "html.parser")
        texts = soup.findAll(text=True)
        res=u" ".join(t.strip() for t in texts if t.parent.name not in ['style', 'script', 'head', 'title', 'meta', '[document]'])
        return(res)
    except:
        return False

 get_text('https://en.wikipedia.org/wiki/Machine_learning')


 def get_source(url):

    try:
        session = HTMLSession()
        response = session.get(url)
    
        return response
    except requests.exceptions.RequestException as e:
        print(e)
 def scrape_google(query):

    query = urllib.parse.quote_plus(query)
    response = get_source("https://www.google.co.uk/search?q=" + query)
    links = list(response.html.absolute_links)
    google_domains = ('https://www.google.', 
                      'https://google.', 
                      'https://webcache.googleusercontent.', 
                      'http://webcache.googleusercontent.', 
                      'https://policies.google.',
                      'https://support.google.',
                      'https://maps.google.')

    for url in links[:]:
        if url.startswith(google_domains):
            links.remove(url)

    return links

 scrape_google("cars")



 nltk.download('stopwords')

 stop_words = set(stopwords.words('english'))
 print(len(stop_words))
 stop_words

 nltk.download('punkt')

 stop_words = set(stopwords.words('english'))


 links=scrape_google('cars')

 text=[]
 for i in links:
   t=get_text(i)
   if t:
     text.append(t)

     word_tokens = word_tokenize(t)

     filtered_sentence = [w for w in word_tokens]

     filtered_sentence = [w for w in word_tokens if not w in stop_words]

     filtered_sentence = [w for w in word_tokens if not w.lower() in stop_words]

     print(word_tokens)
     print('---------------------------------')
     print(filtered_sentence)

#  from nltk.stem.porter import *
   p_stemmer = PorterStemmer()

   for word in  filtered_sentence:
      print(word+' --> '+p_stemmer.stem(word))

#  from nltk.stem.snowball import SnowballStemmer
 s_stemmer = SnowballStemmer(language='english')


 for word in filtered_sentence:
    print(word+' --> '+s_stemmer.stem(word))
 u=p_stemmer.stem(word)



 def tf_idf_analysis(keyword):
    v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=list(stop_words))
    x = v.fit_transform(text)

    f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
    d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    
    tf=pd.DataFrame((f>0).sum(axis=0))

    d=d.reset_index().merge(tf.reset_index(),on='index',how='left')

    d.columns=['word','average_tfidf','max_tfidf','frequency']

    d['frequency']=round((d['frequency']/len(text))*100)

    return(d)

 x= tf_idf_analysis(u)
 x[x['word'].str.isalpha()].sort_values('max_tfidf',ascending=False).head(35)


if __name__ == "__main__":
    app.run(host='0.0.0.0',debug=True,port=4000)
    
 