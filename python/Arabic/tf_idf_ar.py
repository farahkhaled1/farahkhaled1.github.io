import urllib
# pip install requests_html
import requests
# !pip install requests
from requests_html import HTMLSession

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
        print(e)
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
links = scrape_google("فراولة")
for link in links:
  print(link)
from nltk.tokenize import  word_tokenize
import nltk
nltk.download('punkt')
# # EXAMPLE_TEXT = """
# # أبو عبد الله محمد بن موسى الخوارزمي عالم رياضيات وفلك
# # وجغرافيا مسلم. يكنى باسم الخوارزمي وأبي جعفر. قيل أنه ولد حوالي 164هـ 781م (وهو غير مؤكد) وقيل أنه توفي بعد 232هـ أي (بعد 847م). يعتبر
# # من أوائل علماء الرياضيات المسلمين حيث ساهمت أعماله بدور كبير في تقدم الرياضيات في عصره. اتصل بالخليفة العباسي المأمون وعمل في بيت الحكمة في 
# # بغداد وكسب ثقة الخليفة إذ ولاه المأمون بيت الحكمة كما عهد إليه برسم خارطة للأرض عمل فيها أكثر من سبعين جغرافيا. قبل وفاته في 850 م/232 هـ
# # كان الخوارزمي قد ترك العديد من المؤلفات في علوم الرياضيات والفلك والجغرافيا ومن أهمها

# # """
# EXAMPLE_TEXT=links
# print(word_tokenize(EXAMPLE_TEXT))
# links=scrape_google('cars')
import numpy as np
from fake_useragent import UserAgent
import re
from urllib.request import Request, urlopen
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.feature_extraction.text import CountVectorizer
import math

from bs4 import BeautifulSoup

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

    print(word_tokens)
    print('---------------------------------')
    print(filtered_sentence)
stop_words = set(nltk.corpus.stopwords.words("arabic"))
from nltk.stem.isri import ISRIStemmer
import re
st = ISRIStemmer()

# w=filtered_sentence
for word in word_tokens:
    if word not  in stop_words:
    #won't take the input correctly, input = output of tokenization# w= 'كلمات'
        print(word+"-->"+st.stem(word))
        u=st.stem(word)

# import nltk

# from nltk.stem.porter import *
# p_stemmer = PorterStemmer()




# for word in  filtered_sentence:
#     print(word+' --> '+p_stemmer.stem(word))

# from nltk.stem.snowball import SnowballStemmer
# s_stemmer = SnowballStemmer(language='english')



# for word in filtered_sentence:
#     print(word+' --> '+s_stemmer.stem(word))
# u=p_stemmer.stem(word)
import pandas as pd
def tf_idf_analysis(keyword):
    v = TfidfVectorizer(min_df=1,analyzer='word',ngram_range=(1,2),stop_words=stop_words)
    x = v.fit_transform(text)

    f = pd.DataFrame(x.toarray(), columns = v.get_feature_names_out())
    d=pd.concat([pd.DataFrame(f.mean(axis=0)),pd.DataFrame(f.max(axis=0))],axis=1)
    
    
    tf=pd.DataFrame((f>0).sum(axis=0))


    d=d.reset_index().merge(tf.reset_index(),on='index',how='left')

    d.columns=['word','average_tfidf','max_tfidf','frequency']

    d['frequency']=round((d['frequency']/len(text))*100)

    return(d)

x= tf_idf_analysis(u)
print(x[x['word'].str.isalpha()].sort_values('max_tfidf',ascending=False).head(35))
# print('hello')
print(x)