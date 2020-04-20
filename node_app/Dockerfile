FROM node:10-alpine

COPY ./ /app

WORKDIR /app

RUN npm install

EXPOSE 6001

CMD ["node", "server.js"]
