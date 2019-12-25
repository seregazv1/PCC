FROM mcr.microsoft.com/dotnet/core/sdk:3.1-alpine AS build

LABEL maintainer="kislovs1998@gmail.com"

WORKDIR /app/razito

COPY src/*.csproj ./

RUN dotnet restore

COPY src/. ./

RUN export PATH="$PATH:/root/.dotnet/tools" && \

dotnet tool install --global dotnet-ef --version 3.1.0 && \

dotnet ef database update

RUN dotnet publish -c Release -o publish && \

cp app.db publish/app.db

FROM mcr.microsoft.com/dotnet/core/aspnet:3.1-alpine AS runtime

LABEL maintainer="kislovs1998@gmail.com"

RUN apk update && apk upgrade && apk add --no-cache sqlite

WORKDIR /app

COPY --from=build /app/razito/publish ./

ENTRYPOINT ["dotnet", "Razito.dll"]