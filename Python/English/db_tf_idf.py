# -*- coding: utf-8 -*-

import requests
import urllib
import pandas as pd
from requests_html import HTML
from requests_html import HTMLSession
import numpy as np
from fake_useragent import UserAgent
from urllib.request import Request, urlopen
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.feature_extraction.text import CountVectorizer
from nltk.data import url2pathname

from nltk.tokenize import word_tokenize
from nltk.stem.porter import *

from bs4 import BeautifulSoup

from nltk.corpus import stopwords

import nltk
nltk.download('stopwords')
nltk.download('punkt')

stop_words = set(stopwords.words('english')) 
stop_words.add('le')
stop_words.add('eu')
stop_words.add('span')
stop_words.add('div')
stop_words.add('src')
stop_words.add('page')
stop_words.add('egp')
stop_words.add('url')
stop_words.add('cdn')
stop_words.add('alt')
stop_words.add('com')
stop_words.add('net')
stop_words.add('org')
stop_words.add('cdn')
stop_words.add('img')





# stop_words.add('the', 'google','yes', 'no', 'llc','egp','usd','cdn','src','alt','img','files','word')



import mysql.connector

# Connect to the database
mysql = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="seopro"
)

# Create a cursor object
mycursor = mysql.cursor()

# Execute an SQL query to select the last row from the table
mycursor.execute("SELECT niche FROM given_niche ORDER BY id DESC LIMIT 1")

# Fetch the last row from the table
niche_arr = mycursor.fetchone()

# Convert niche[0] to a string
niche= str(niche_arr[0])

# Print the last row as a string
print(niche)





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
    
"""Step 2: Get the URLs from competitors

"""

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

# niche = input("enter your niche")
# scrape_google(niche)

"""Step 3: Analyse the text and get the most important words."""

# niche = input("enter your niche: ")
links=scrape_google(niche)

text=[]
for i in links:
  t=get_text(i)
  if t:
    text.append(t)

    word_tokens = word_tokenize(t)

   
    filtered_sentence = [w for w in word_tokens if not w.lower() in stop_words]

    # print(word_tokens)
    # print('---------------------------------')
    # print(filtered_sentence)

p_stemmer = PorterStemmer()




for word in  filtered_sentence:
    word+' --> '+p_stemmer.stem(word)

from nltk.stem.snowball import SnowballStemmer
s_stemmer = SnowballStemmer(language='english')



for word in filtered_sentence:
    word+' --> '+s_stemmer.stem(word)
u=p_stemmer.stem(word)
import mysql.connector


# Modify the tf_idf_analysis function to return a DataFrame
def tf_idf_analysis(keyword):
    v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=list(stop_words))
    x = v.fit_transform(text)

    f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
    d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    
    
    tf=pd.DataFrame((f>0).sum(axis=0))


    d=d.reset_index().merge(tf.reset_index(),on='index',how='left')

    d.columns=['word','average_tfidf','max_tfidf','frequency']

    d['frequency']=round((d['frequency']/len(text))*100)
    d['max_tfidf'] = d['max_tfidf'].round(2)
    d['average_tfidf'] = d['average_tfidf'].round(2)
    
    # d = d[(d['word'].str.isalpha()) & (d['average_tfidf'] >= 0.05)].sort_values('max_tfidf', ascending=False).head(50)
    
    # return d

    return d[d['word'].str.isalpha()].sort_values('max_tfidf',ascending=False).head(35)


# Call the tf_idf_analysis function and store the output in a DataFrame variable
output_df = tf_idf_analysis(u)
print (output_df)
# Convert the DataFrame to a dictionary
output_dict = output_df.to_dict('records')

# Connect to the database
mysql = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="seopro"
)

# Insert the data into the database
mycursor = mysql.cursor()
sql = "INSERT INTO keywords (word, average_tfidf, max_tfidf, frequency, niche) VALUES (%s, %s, %s, %s, %s)"
for row in output_dict:
    val = (row['word'], row['average_tfidf'], row['max_tfidf'], row['frequency'], niche)
    mycursor.execute(sql, val)
mysql.commit()

# Print a message to confirm that the data has been saved
print("Data has been saved to the database.")
