import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
from scipy import optimize

def linear(x,a,b):
    return (a*x)+b

data=pd.read_csv('C:\\_git\\github\\Python4N00bs\\ExercicesCode\\FunctionFitting\\data\\linear.csv')

x = data['x'].values
y = data['y'].values
c,cov= optimize.curve_fit(linear,x,y,[2,1])
print(c)

plt.figure()
m, = plt.plot(x,y,'ro',markersize=2,label='measured data')
p, = plt.plot(x,linear(x,c[0],c[1]),'g-', label='linear data')
plt.legend(handles=[m,p])
plt.xlabel('x values')
plt.ylabel('y values')
plt.title('FunctionFitting Linear.csv')
#plt.savefig('data\\linear.png')
#plt.savefig('data\\linear.svg')
plt.show()