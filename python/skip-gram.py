pip install fake-useragent

pip install requests-html 

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

from nltk.data import url2pathname
import nltk
nltk.download('stopwords')

from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize

stop_words = set(stopwords.words('english'))
print(len(stop_words))
stop_words

import nltk
nltk.download('punkt')
# example_sent = get_text('https://en.wikipedia.org/wiki/Machine_learning')
stop_words = set(stopwords.words('english'))

links=scrape_google('cars')

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

    filtered_sentence = [w for w in word_tokens if not w in stop_words]

    # print(word_tokens)
    # print('---------------------------------')
    # print(filtered_sentence)
    filtered_sentence = [w for w in word_tokens if not w.lower() in stop_words]

    print(word_tokens)
    print('---------------------------------')
    print(filtered_sentence)

import nltk

from nltk.stem.porter import *
p_stemmer = PorterStemmer()
for word in  filtered_sentence:
    print(word+' --> '+p_stemmer.stem(word))

from nltk.stem.snowball import SnowballStemmer
s_stemmer = SnowballStemmer(language='english')
for word in filtered_sentence:
    print(word+' --> '+s_stemmer.stem(word))
u=s_stemmer.stem(word)

import torch
torch.manual_seed(10)
from torch.autograd import Variable
from torch.utils.data import DataLoader
import pandas as pd
import numpy as np
from sklearn import decomposition
from pathlib import Path
import warnings
warnings.filterwarnings("ignore")
import seaborn as sns
from matplotlib import pyplot as plt
plt.rcParams['figure.figsize'] = (10,8)
import nltk
nltk.download('stopwords')
nltk.download('punkt')
#Import stopwords
from nltk.corpus import stopwords

# corpus = [
#     'drink milk',
#     'drink cold water',
#     'drink cold cola',
#     'drink juice',
#     'drink cola',
#     'eat bacon',
#     'eat mango',
#     'eat cherry',
#     'eat apple',
#     'juice with sugar',
#     'cola with sugar',
#     'mango is fruit',
#     'apple is fruit',
#     'cherry is fruit',
#     'Berlin is Germany',
#     'Boston is USA',
#     'Mercedes from Germany',
#     'Mercedes is a car',
#     'Ford from USA',
#     'Ford is a car'
# ]

def create_vocabulary(corpus):
    '''Creates a dictionary with all unique words in corpus with id'''
    vocabulary = {}
    i = 0
    for s in corpus:
        for w in s.split():
            if w not in vocabulary:
                vocabulary[w] = i
                i+=1
    return vocabulary

def prepare_set(corpus, n_gram = 1):
    '''Creates a dataset with Input column and Outputs columns for neighboring words. 
       The number of neighbors = n_gram*2'''
    columns = ['Input'] + [f'Output{i+1}' for i in range(n_gram*2)]
    result = pd.DataFrame(columns = columns)
    for sentence in corpus:
        for i,w in enumerate(sentence.split()):
            inp = [w]
            out = []
            for n in range(1,n_gram+1):
                # look back
                if (i-n)>=0:
                    out.append(sentence.split()[i-n])
                else:
                    out.append('<padding>')
                
                # look forward
                if (i+n)<len(sentence.split()):
                    out.append(sentence.split()[i+n])
                else:
                    out.append('<padding>')
            row = pd.DataFrame([inp+out], columns = columns)
            result = result.append(row, ignore_index = True)
    return result

def prepare_set_ravel(corpus, n_gram = 1):
    '''Creates a dataset with Input column and Output column for neighboring words. 
       The number of neighbors = n_gram*2'''
    columns = ['Input', 'Output']
    result = pd.DataFrame(columns = columns)
    for sentence in corpus:
        for i,w in enumerate(sentence.split()):
            inp = w
            for n in range(1,n_gram+1):
                # look back
                if (i-n)>=0:
                    out = sentence.split()[i-n]
                    row = pd.DataFrame([[inp,out]], columns = columns)
                    result = result.append(row, ignore_index = True)
                
                # look forward
                if (i+n)<len(sentence.split()):
                    out = sentence.split()[i+n]
                    row = pd.DataFrame([[inp,out]], columns = columns)
                    result = result.append(row, ignore_index = True)
    return result


stop_words = set(stopwords.words('english'))

def preprocess(corpus):
    result = []
    for i in corpus:
      out = nltk.word_tokenize(i)
      out = [x.lower() for x in out]
      out = [x for x in out if x not in stop_words]
      result.append(" ". join(out))
    return result

corpus = preprocess(u)
corpus

vocabulary = create_vocabulary(u)
vocabulary

train_emb = prepare_set(u, n_gram = 2)
train_emb.head()

train_emb = prepare_set_ravel(corpus, n_gram = 2)
train_emb.head()

train_emb.Input = train_emb.Input.map(vocabulary)
train_emb.Output = train_emb.Output.map(vocabulary)
train_emb.head()

vocab_size = len(vocabulary)

def get_input_tensor(tensor):
    '''Transform 1D tensor of word indexes to one-hot encoded 2D tensor'''
    size = [*tensor.shape][0]
    inp = torch.zeros(size, vocab_size).scatter_(1, tensor.unsqueeze(1), 1.)
    return Variable(inp).float()

embedding_dims = 5
device = torch.device('cpu')

initrange = 0.5 / embedding_dims
W1 = Variable(torch.randn(vocab_size, embedding_dims, device=device).uniform_(-initrange, initrange).float(), requires_grad=True) # shape V*H
W2 = Variable(torch.randn(embedding_dims, vocab_size, device=device).uniform_(-initrange, initrange).float(), requires_grad=True) #shape H*V
print(f'W1 shape is: {W1.shape}, W2 shape is: {W2.shape}')

# num_epochs = 2000
learning_rate = 2e-1
lr_decay = 0.99
loss_hist = []

%%time
for epo in range(num_epochs):
    for x,y in zip(DataLoader(train_emb.Input.values, batch_size=train_emb.shape[0]), DataLoader(train_emb.Output.values, batch_size=train_emb.shape[0])):
        
        # one-hot encode input tensor
        input_tensor = get_input_tensor(x) #shape N*V
     
        # simple NN architecture
        h = input_tensor.mm(W1) # shape 1*H
        y_pred = h.mm(W2) # shape 1*V
        
        # define loss func
        loss_f = torch.nn.CrossEntropyLoss() # see details: https://pytorch.org/docs/stable/nn.html
        
        #compute loss
        loss = loss_f(y_pred, y)
        
        # bakpropagation step
        loss.backward()
        
        # Update weights using gradient descent. For this step we just want to mutate
        # the values of w1 and w2 in-place; we don't want to build up a computational
        # graph for the update steps, so we use the torch.no_grad() context manager
        # to prevent PyTorch from building a computational graph for the updates
        with torch.no_grad():
            # SGD optimization is implemented in PyTorch, but it's very easy to implement manually providing better understanding of process
            W1 -= learning_rate*W1.grad.data
            W2 -= learning_rate*W2.grad.data
            # zero gradients for next step
            W1.grad.data.zero_()
            W1.grad.data.zero_()
    if epo%10 == 0:
        learning_rate *= lr_decay
    loss_hist.append(loss)
    if epo%50 == 0:
        print(f'Epoch {epo}, loss = {loss}')

