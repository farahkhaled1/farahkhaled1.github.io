# import urllib
# # pip install requests_html
# import requests
# # !pip install requests
# from requests_html import HTMLSession

# def get_source(url):
#     """Return the source code for the provided URL. 
#     Args: 
#         url (string): URL of the page to scrape.
#     Returns:
#         response (object): HTTP response object from requests_html. 
#     """
#     try:
#         session = HTMLSession()
#         response = session.get(url)
#         return response
#     except requests.exceptions.RequestException as e:
#         print(e)
# def scrape_google(query):
    
#     # query = urllib.parse.quote_plus(query)
#     response = get_source("https://www.google.com/search?q=" + query)
#     links = list(response.html.absolute_links)
#     # google_domains = ('https://www.google.', 
#     #                   'https://google.', 
#     #                   'https://webcache.googleusercontent.', 
#     #                   'http://webcache.googleusercontent.', 
#     #                   'https://policies.google.',
#     #                   'https://support.google.',
#     #                   'https://maps.google.')
#     google_domains = ('https://www.google.', 
#                       'https://google.')

#     for url in links[:]:
#         if url.startswith(google_domains):
#             links.remove(url)

#     return links
# links = scrape_google("فراولة")
# for link in links:
#   print(link)
# from nltk.tokenize import  word_tokenize
# import nltk
# nltk.download('punkt')
# # # EXAMPLE_TEXT = """
# # # أبو عبد الله محمد بن موسى الخوارزمي عالم رياضيات وفلك
# # # وجغرافيا مسلم. يكنى باسم الخوارزمي وأبي جعفر. قيل أنه ولد حوالي 164هـ 781م (وهو غير مؤكد) وقيل أنه توفي بعد 232هـ أي (بعد 847م). يعتبر
# # # من أوائل علماء الرياضيات المسلمين حيث ساهمت أعماله بدور كبير في تقدم الرياضيات في عصره. اتصل بالخليفة العباسي المأمون وعمل في بيت الحكمة في 
# # # بغداد وكسب ثقة الخليفة إذ ولاه المأمون بيت الحكمة كما عهد إليه برسم خارطة للأرض عمل فيها أكثر من سبعين جغرافيا. قبل وفاته في 850 م/232 هـ
# # # كان الخوارزمي قد ترك العديد من المؤلفات في علوم الرياضيات والفلك والجغرافيا ومن أهمها

# # # """
# # EXAMPLE_TEXT=links
# # print(word_tokenize(EXAMPLE_TEXT))
# # links=scrape_google('cars')
# import numpy as np
# from fake_useragent import UserAgent
# import re
# from urllib.request import Request, urlopen
# from sklearn.feature_extraction.text import TfidfVectorizer
# from sklearn.feature_extraction.text import CountVectorizer
# import math

# from bs4 import BeautifulSoup

# def get_text(url):
#     try:
#         req = Request(url , headers={'User-Agent': 'Mozilla/5.0'})
#         webpage = urlopen(req,timeout=5).read()
#         soup = BeautifulSoup(webpage, "html.parser")
#         texts = soup.findAll(text=True)
#         res=u" ".join(t.strip() for t in texts if t.parent.name not in ['style', 'script', 'head', 'title', 'meta', '[document]'])
#         return(res)
#     except:
#         return False
# get_text('https://en.wikipedia.org/wiki/Machine_learning')
# text=[]
# for i in links:
#   t=get_text(i)
#   if t:
#     text.append(t)

#     word_tokens = word_tokenize(t)
# # word_tokens = 

#     filtered_sentence = [w for w in word_tokens]

#     # print(word_tokens)
#     # print('---------------------------------')
#     # print(filtered_sentence)

#     filtered_sentence = [w for w in word_tokens if not w in word_tokens]

#     # print(word_tokens)
#     # print('---------------------------------')
#     # print(filtered_sentence)
#     filtered_sentence = [w for w in word_tokens if not w.lower() in word_tokens]

#     print(word_tokens)
#     print('---------------------------------')
#     print(filtered_sentence)
# stop_words = set(nltk.corpus.stopwords.words("arabic"))
# from nltk.stem.isri import ISRIStemmer
# import re
# st = ISRIStemmer()

# # w=filtered_sentence
# for word in word_tokens:
#     if word not  in stop_words:
#     #won't take the input correctly, input = output of tokenization# w= 'كلمات'
#         print(word+"-->"+st.stem(word))
#         u=st.stem(word)

# # import nltk

# # from nltk.stem.porter import *
# # p_stemmer = PorterStemmer()




# # for word in  filtered_sentence:
# #     print(word+' --> '+p_stemmer.stem(word))

# # from nltk.stem.snowball import SnowballStemmer
# # s_stemmer = SnowballStemmer(language='english')



# # for word in filtered_sentence:
# #     print(word+' --> '+s_stemmer.stem(word))
# # u=p_stemmer.stem(word)
# import pandas as pd
# def tf_idf_analysis(keyword):
#     v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=stop_words)
#     x = v.fit_transform(text)

#     f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
#     d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    
    
#     tf=pd.DataFrame((f>0).sum(axis=0))


#     d=d.reset_index().merge(tf.reset_index(),on='index',how='left')

#     d.columns=['word','average_tfidf','max_tfidf','frequency']

#     d['frequency']=round((d['frequency']/len(text))*100)

#     return(d)

# x= tf_idf_analysis(u)
# print(x[x['word'].str.isalpha()].sort_values('max_tfidf',ascending=False).head(35))
# # print('hello')
# print(x)



# import requests
# import urllib
# # %pip install requests_html
# import requests
# from urllib.request import Request, urlopen
# # !pip install requests
# from requests_html import HTMLSession
# import mysql.connector
# import pandas as pd
# from nltk.data import url2pathname
# import warnings
# warnings.filterwarnings("ignore")

# import logging
# import sys
# args = sys.argv
# logger = logging.getLogger()
# logger.setLevel(args[1] if args[1].strip() else logging.INFO)
# formatter = logging.Formatter('%(asctime)s | %(levelname)s | %(message)s', 
#                               '%m-%d-%Y %H:%M:%S')

# stdout_handler = logging.StreamHandler(sys.stdout)
# stdout_handler.setLevel(args[1] if args[1].strip() else logging.INFO)
# stdout_handler.setFormatter(formatter)

# file_handler = logging.FileHandler('logs.log')
# file_handler.setLevel(logging.DEBUG)
# file_handler.setFormatter(formatter)

# logger.addHandler(file_handler)
# logger.addHandler(stdout_handler)
# nltk.download('stopwords', quiet=True)
# nltk.download('punkt', quiet=True)
# # Connect to the database
# mysql = mysql.connector.connect(
#     host="localhost",
#     user="root",
#     password="",
#     database="seopro"
# )

# # Create a cursor object
# mycursor = mysql.cursor()

# # Execute an SQL query to select the last row from the table
# mycursor.execute("SELECT uid, niche FROM given_niche_ar ORDER BY id DESC LIMIT 1")

# # Fetch the last row from the table
# niche_arr = mycursor.fetchone()

# # # Convert niche[0] to a string
# # niche= str(niche_arr[0])

# # # Print the last row as a string
# # print(niche)

# # Extract the id and niche values from the row
# uid = niche_arr[0]
# niche = niche_arr[1]

# # Print the niche and id values
# logger.info(niche)
# logger.info(uid)
# def get_source(url):
#     """Return the source code for the provided URL. 
#     Args: 
#         url (string): URL of the page to scrape.
#     Returns:
#         response (object): HTTP response object from requests_html. 
#     """
#     try:
#         session = HTMLSession()
#         response = session.get(url)
#         return response
#     except requests.exceptions.RequestException as e:
#         logger.info(e)
# def scrape_google(query):
    
#     # query = urllib.parse.quote_plus(query)
#     response = get_source("https://www.google.com/search?q=" + query)
#     links = list(response.html.absolute_links)
#     google_domains = ('https://www.google.', 
#                       'https://google.', 
#                       'https://webcache.googleusercontent.', 
#                       'http://webcache.googleusercontent.', 
#                       'https://policies.google.',
#                       'https://support.google.',
#                       'https://maps.google.')

#     for url in links[:]:
#         if url.startswith(google_domains):
#             links.remove(url)

#     return links

# links = scrape_google(niche)
# for link in links:
#   logger.info(link)

# from nltk.tokenize import  word_tokenize
# import nltk
# nltk.download('punkt')
# # # EXAMPLE_TEXT = """
# # # أبو عبد الله محمد بن موسى الخوارزمي عالم رياضيات وفلك
# # # وجغرافيا مسلم. يكنى باسم الخوارزمي وأبي جعفر. قيل أنه ولد حوالي 164هـ 781م (وهو غير مؤكد) وقيل أنه توفي بعد 232هـ أي (بعد 847م). يعتبر
# # # من أوائل علماء الرياضيات المسلمين حيث ساهمت أعماله بدور كبير في تقدم الرياضيات في عصره. اتصل بالخليفة العباسي المأمون وعمل في بيت الحكمة في 
# # # بغداد وكسب ثقة الخليفة إذ ولاه المأمون بيت الحكمة كما عهد إليه برسم خارطة للأرض عمل فيها أكثر من سبعين جغرافيا. قبل وفاته في 850 م/232 هـ
# # # كان الخوارزمي قد ترك العديد من المؤلفات في علوم الرياضيات والفلك والجغرافيا ومن أهمها

# # # """
# # EXAMPLE_TEXT=links
# # print(word_tokenize(EXAMPLE_TEXT))

# # links=scrape_google('cars')
# import numpy as np
# from fake_useragent import UserAgent
# import re
# from urllib.request import Request, urlopen
# from sklearn.feature_extraction.text import TfidfVectorizer
# from sklearn.feature_extraction.text import CountVectorizer
# import math

# from bs4 import BeautifulSoup

# def get_text(url):
#     try:
#         req = Request(url , headers={'User-Agent': 'Mozilla/5.0'})
#         webpage = urlopen(req,timeout=5).read()
#         soup = BeautifulSoup(webpage, "html.parser")
#         texts = soup.findAll(text=True)
#         res=u" ".join(t.strip() for t in texts if t.parent.name not in ['style', 'script', 'head', 'title', 'meta', '[document]'])
#         return(res)
#     except:
#         return False
# get_text('https://en.wikipedia.org/wiki/Machine_learning')
# text=[]
# for i in links:
#   t=get_text(i)
#   if t:
#     text.append(t)

#     word_tokens = word_tokenize(t)
# # word_tokens = 

#     filtered_sentence = [w for w in word_tokens]

#     # print(word_tokens)
#     # print('---------------------------------')
#     # print(filtered_sentence)

#     filtered_sentence = [w for w in word_tokens if not w in word_tokens]

#     # print(word_tokens)
#     # print('---------------------------------')
#     # print(filtered_sentence)
#     filtered_sentence = [w for w in word_tokens if not w.lower() in word_tokens]

#     logger.info(word_tokens)
#     logger.info('---------------------------------')
#     logger.info(filtered_sentence)

# stop_words = set(nltk.corpus.stopwords.words("arabic"))
# from nltk.stem.isri import ISRIStemmer
# import re
# st = ISRIStemmer()

# # w=filtered_sentence
# for word in word_tokens:
#     if word not  in stop_words:
#     #won't take the input correctly, input = output of tokenization# w= 'كلمات'
#         logger.info(word+"-->"+st.stem(word))
#         u=st.stem(word)

# # import nltk

# # from nltk.stem.porter import *
# # p_stemmer = PorterStemmer()




# # for word in  filtered_sentence:
# #     print(word+' --> '+p_stemmer.stem(word))

# # from nltk.stem.snowball import SnowballStemmer
# # s_stemmer = SnowballStemmer(language='english')



# # for word in filtered_sentence:
# #     print(word+' --> '+s_stemmer.stem(word))
# # u=p_stemmer.stem(word)
# # import pandas as pd
# # def tf_idf_analysis(keyword):
# #     v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=stop_words)
# #     x = v.fit_transform(text)

# #     f = pd.DataFrame(x.toarray(), columns = v.get_feature_names())
# #     d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    
    
# #     tf=pd.DataFrame((f>0).sum(axis=0))


# #     d=d.reset_index().merge(tf.reset_index(),on='index',how='left')

# #     d.columns=['word','average_tfidf','max_tfidf','frequency']

# #     d['frequency']=round((d['frequency']/len(text))*100)

# #     return(d)

# # x= tf_idf_analysis(u)
# # x[x['word'].str.isalpha()].sort_values('max_tfidf',ascending=False).head(35)
# def tf_idf_analysis(keyword):
#     v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=list(stop_words))
#     x = v.fit_transform(text)
#     f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
#     d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
#     tf=pd.DataFrame((f>0).sum(axis=0))
#     d=d.reset_index().merge(tf.reset_index(),on='index',how='left')
#     d.columns=['word','average_tfidf','max_tfidf','frequency']
#     d['frequency']=round((d['frequency']/len(text))*100)
#     d['max_tfidf'] = d['max_tfidf'].round(3)
#     d['average_tfidf'] = d['average_tfidf'].round(3)

#     d= d[d['word'].str.isalpha()].sort_values('frequency',ascending=False).head(35)
    
#     return d

# import requests


# # Call the tf_idf_analysis function and store the output in a DataFrame variable
# output_df = tf_idf_analysis(u)
# logger.info (output_df)
# # Convert the DataFrame to a dictionary
# output_dict = output_df.to_dict('records')

# # Connect to the database
# # mysql = mysql.connector.connect(
# #     host="localhost",
# #     user="root",
# #     passwd="",
# #     database="seopro"
# # )

# # # Insert the data into the database
# # mycursor = mysql.cursor()
# sql = "INSERT INTO keyword_ar (word, average_tfidf, max_tfidf, frequency, niche, uid) VALUES (%s, %s, %s, %s, %s, %s)"
# for row in output_dict:
#     val = (row['word'], row['average_tfidf'], row['max_tfidf'], row['frequency'], niche, uid)
#     mycursor.execute(sql, val)
#     # data = {'word': row['word'], 'average_tfidf': row['average_tfidf']}
#     # response = requests.post('http://example.com/api/data', data=data)
#     # if response.status_code == 200:
#     #     print('Data sent successfully')
#     # else:
#     #     print('Error sending data')

# mysql.commit()

# # Print a message to confirm that the data has been saved
# logger.info("Data has been saved to the database.")
# print("success")
# print(x)
######################################################################
# import pandas as pd
# # documentA = 'ذهب محمد الي الجامعة ليدرس الفيزياء و الكيمياء'
# # documentB=u
# documentA=u
# bagOfWordsA = documentA.split(' ')
# # bagOfWordsB = documentB.split(' ')
# uniqueWords = set(bagOfWordsA)
# uniqueWords
# numOfWordsA = dict.fromkeys(uniqueWords, 0)

# for word in bagOfWordsA:
#     numOfWordsA[word] += 1
# numOfWordsA
# numOfWordsB = dict.fromkeys(uniqueWords, 0)

# for word in bagOfWordsA:
#     numOfWordsB[word] += 1

# numOfWordsB    
# def computeTF(wordDict, bagOfWords):
#     tfDict = {}
#     bagOfWordsCount = len(bagOfWords)
#     for word, count in wordDict.items():
#         tfDict[word] = count / float(bagOfWordsCount)
#     return tfDict
# tfB = computeTF(numOfWordsB, bagOfWordsA)
# print(tfB)




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
import warnings
warnings.filterwarnings("ignore")
from nltk.tokenize import word_tokenize
from nltk.stem.porter import *

from bs4 import BeautifulSoup
from nltk.tokenize import  word_tokenize
import nltk
nltk.download('punkt')
from nltk.corpus import stopwords

import nltk

import logging
import sys
args = sys.argv
logger = logging.getLogger()
# logger.setLevel(args[1] if args[1].strip() else logging.INFO)
logger.setLevel(args[1] if len(args) > 1 and args[1].strip() else logging.INFO)

formatter = logging.Formatter('%(asctime)s | %(levelname)s | %(message)s', 
                              '%m-%d-%Y %H:%M:%S')

stdout_handler = logging.StreamHandler(sys.stdout)
stdout_handler.setLevel(args[1] if len(args) > 1 and args[1].strip() else logging.INFO)

stdout_handler.setFormatter(formatter)

file_handler = logging.FileHandler('logs.log')
file_handler.setLevel(logging.DEBUG)
file_handler.setFormatter(formatter)

logger.addHandler(file_handler)
logger.addHandler(stdout_handler)
nltk.download('stopwords', quiet=True)
nltk.download('punkt', quiet=True)

stop_words = set(stopwords.words('arabic')) 
stop_words.update(['le', 'eu', 'span', 'ago', 'pp', 'ue', 'div', 'src', 'page', 'egp', 'url', 'cdn', 'alt', 'com', 'net', 'org', 'cdn', 'img', 'google','eg','usd','http','https','net','us','eg'])




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
mycursor.execute("SELECT uid, niche FROM given_niche_ar ORDER BY id DESC LIMIT 1")

# Fetch the last row from the table
niche_arr = mycursor.fetchone()

# # Convert niche[0] to a string
# niche= str(niche_arr[0])

# # Print the last row as a string
# logger.info(niche)

# Extract the id and niche values from the row
uid = niche_arr[0]
niche = niche_arr[1]

# Print the niche and id values
logger.info(niche)
logger.info(uid)

def get_source(url):
    """Return the source code for the provided URL. 
    Args: 
        url (string): URL of the page to scrape.
    Returns:
        response (object): HTTP response object from requests_html. 
    """
    try:
        session = HTMLSession()
        response = session.get(url)
        return response
    except requests.exceptions.RequestException as e:
        logger.info(e)

def scrape_google(query):
    
    # query = urllib.parse.quote_plus(query)
    response = get_source("https://www.google.com/search?q=" + query)
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
links = scrape_google(niche)
for link in links:
  logger.info(link)



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
text=[]
for i in links:
  t=get_text(i)
  if t:
    text.append(t)

    word_tokens = word_tokenize(t)
# word_tokens = 

    filtered_sentence = [w for w in word_tokens]

    # print(word_tokens)
    # print('---------------------------------')
    # print(filtered_sentence)

    filtered_sentence = [w for w in word_tokens if not w in word_tokens]

    # print(word_tokens)
    # print('---------------------------------')
    # print(filtered_sentence)
    filtered_sentence = [w for w in word_tokens if not w.lower() in word_tokens]

    logger.info(word_tokens)
    logger.info('---------------------------------')
    logger.info(filtered_sentence)




stop_words = set(nltk.corpus.stopwords.words("arabic"))
from nltk.stem.isri import ISRIStemmer
import re
st = ISRIStemmer()

# w=filtered_sentence
for word in word_tokens:
    if word not  in stop_words:
    #won't take the input correctly, input = output of tokenization# w= 'كلمات'
        logger.info(word+"-->"+st.stem(word))
        u=st.stem(word)

# import pandas as pd
# def tf_idf_analysis(keyword):
#     v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=stop_words)
#     x = v.fit_transform(text)

#     f = pd.DataFrame(x.toarray(), columns = v.get_feature_names())
#     d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    
    
#     tf=pd.DataFrame((f>0).sum(axis=0))


#     d=d.reset_index().merge(tf.reset_index(),on='index',how='left')

#     d.columns=['word','average_tfidf','max_tfidf','frequency']

#     d['frequency']=round((d['frequency']/len(text))*100)

#     return(d)

# x= tf_idf_analysis(u)
# x[x['word'].str.isalpha()].sort_values('max_tfidf',ascending=False).head(35)
def tf_idf_analysis(keyword):
    v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=list(stop_words))
    x = v.fit_transform(text)
    f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
    d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    tf=pd.DataFrame((f>0).sum(axis=0))
    d=d.reset_index().merge(tf.reset_index(),on='index',how='left')
    d.columns=['word','average_tfidf','max_tfidf','frequency']
    d['frequency']=round((d['frequency']/len(text))*100)
    d['max_tfidf'] = d['max_tfidf'].round(3)
    d['average_tfidf'] = d['average_tfidf'].round(3)

    d= d[d['word'].str.isalpha()].sort_values('frequency',ascending=False).head(35)
    
    return d

import requests


# Call the tf_idf_analysis function and store the output in a DataFrame variable
output_df = tf_idf_analysis(u)
logger.info (output_df)
# Convert the DataFrame to a dictionary
output_dict = output_df.to_dict('records')

# Connect to the database
# mysql = mysql.connector.connect(
#     host="localhost",
#     user="root",
#     passwd="",
#     database="seopro"
# )

# # Insert the data into the database
# mycursor = mysql.cursor()
sql = "INSERT INTO keyword_ar (word, average_tfidf, max_tfidf, frequency, niche, uid) VALUES (%s, %s, %s, %s, %s, %s)"
for row in output_dict:
    val = (row['word'], row['average_tfidf'], row['max_tfidf'], row['frequency'], niche, uid)
    mycursor.execute(sql, val)
    # data = {'word': row['word'], 'average_tfidf': row['average_tfidf']}
    # response = requests.post('http://example.com/api/data', data=data)
    # if response.status_code == 200:
    #     print('Data sent successfully')
    # else:
    #     print('Error sending data')

mysql.commit()

# Print a message to confirm that the data has been saved
logger.info("Data has been saved to the database.")
print("success")
# print(x)
#######################################################################
# import pandas as pd
# # documentA = 'ذهب محمد الي الجامعة ليدرس الفيزياء و الكيمياء'
# # documentB=u
# documentA=u
# bagOfWordsA = documentA.split(' ')
# # bagOfWordsB = documentB.split(' ')
# uniqueWords = set(bagOfWordsA)
# uniqueWords
# numOfWordsA = dict.fromkeys(uniqueWords, 0)

# for word in bagOfWordsA:
#     numOfWordsA[word] += 1
# numOfWordsA
# numOfWordsB = dict.fromkeys(uniqueWords, 0)

# for word in bagOfWordsA:
#     numOfWordsB[word] += 1

# numOfWordsB    
# def computeTF(wordDict, bagOfWords):
#     tfDict = {}
#     bagOfWordsCount = len(bagOfWords)
#     for word, count in wordDict.items():
#         tfDict[word] = count / float(bagOfWordsCount)
#     return tfDict
# tfB = computeTF(numOfWordsB, bagOfWordsA)
# print(tfB)



# p_stemmer = PorterStemmer()




# for word in filtered_sentence:
#     # if len(word) >= 3:
#     word+' --> '+p_stemmer.stem(word)

# from nltk.stem.snowball import SnowballStemmer
# s_stemmer = SnowballStemmer(language='english')



# for word in filtered_sentence:
#     if len(word) >=4:
#         word+' --> '+s_stemmer.stem(word)
# u=p_stemmer.stem(word)
# import mysql.connector

# ########
# # Modify the tf_idf_analysis function to return a DataFrame
# def tf_idf_analysis(keyword):
#     v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=list(stop_words))
#     x = v.fit_transform(text)
#     f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
#     d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
#     tf=pd.DataFrame((f>0).sum(axis=0))
#     d=d.reset_index().merge(tf.reset_index(),on='index',how='left')
#     d.columns=['word','average_tfidf','max_tfidf','frequency']
#     d['frequency']=round((d['frequency']/len(text))*100)
#     d['max_tfidf'] = d['max_tfidf'].round(3)
#     d['average_tfidf'] = d['average_tfidf'].round(3)

#     d= d[d['word'].str.isalpha()].sort_values('frequency',ascending=False).head(35)
    
#     return d


# # Call the tf_idf_analysis function and store the output in a DataFrame variable
# output_df = tf_idf_analysis(u)
# logger.info (output_df)
# # Convert the DataFrame to a dictionary
# output_dict = output_df.to_dict('records')

# # Connect to the database
# mysql = mysql.connector.connect(
#     host="localhost",
#     user="root",
#     passwd="",
#     database="seopro"
# )

# # Insert the data into the database
# mycursor = mysql.cursor()
# sql = "INSERT INTO keywords (word, average_tfidf, max_tfidf, frequency, niche, uid) VALUES (%s, %s, %s, %s, %s, %s)"
# for row in output_dict:
#     val = (row['word'], row['average_tfidf'], row['max_tfidf'], row['frequency'], niche, uid)
#     mycursor.execute(sql, val)
# mysql.commit()

# # Print a message to confirm that the data has been saved
# logger.info("Data has been saved to the database.")

# print("success")




