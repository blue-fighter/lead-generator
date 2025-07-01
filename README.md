# Lead generator for test task of Leads.Tech project

## How to run

Once you downloaded project from repository, execute this from project's root path

```bash
docker build -t lead_gen .
```

Then run the container with setting the name

```bash
docker run --name leads -d lead_gen:latest
```

To execute handler:

```bash
docker exec -it leads php src/start.php
```

To copy file from container:

```bash
docker cp leads:/application/log.txt log.txt
```