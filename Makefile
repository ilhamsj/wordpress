PROJECT = wordpress
NAME = registry.ilhamjs.io/$(PROJECT)
ARCH ?= amd64
VERSION = 0.0.1-$(ARCH)

.PHONY: build build-nocache tag-latest push push-latest release git-tag-version

export DOCKER_BUILDKIT=1

build:
	@echo "Using GitHub Token from ENV"
	@if [ -z "$$GITHUB_PERSONAL_ACCESS_TOKEN" ]; then echo "Error: GITHUB_PERSONAL_ACCESS_TOKEN is not set" && exit 1; fi
	@echo "$$GITHUB_PERSONAL_ACCESS_TOKEN" > github_token.txt
	docker build --secret id=github_token,src=github_token.txt \
		-f Dockerfile -t $(NAME):$(VERSION) --platform=linux/$(ARCH) --rm .
	@rm -f github_token.txt

tag-latest:
	docker tag $(NAME):$(VERSION) $(NAME):$(ARCH)-latest

push:
	docker push $(NAME):$(VERSION)

push-latest:
	docker push $(NAME):$(ARCH)-latest

release: build tag-latest push push-latest

git-tag-version: release
	git tag -a v$(VERSION) -m "v$(VERSION)"

clean:
	docker image prune -f

remove:
	docker rmi $(NAME):$(VERSION)